<?php

namespace Tests\Feature;

use App\Models\Fasilitas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class FasilitasControllerTest extends TestCase
{
    use RefreshDatabase;

    protected string $uploadDir;

    protected function setUp(): void
    {
        parent::setUp();
        // Siapkan folder public/upload/fasilitas untuk uji file move()
        $this->uploadDir = public_path('upload/fasilitas');
        if (!is_dir($this->uploadDir)) {
            @mkdir($this->uploadDir, 0775, true);
        }
    }

    protected function tearDown(): void
    {
        // Bersihkan file test agar tidak numpuk
        if (is_dir($this->uploadDir)) {
            collect(File::files($this->uploadDir))->each(fn ($f) => @unlink($f->getPathname()));
            @rmdir($this->uploadDir);
            // Hapus folder induk /upload jika kosong
            $parent = dirname($this->uploadDir);
            if (is_dir($parent) && count(scandir($parent)) <= 2) {
                @rmdir($parent);
            }
        }
        parent::tearDown();
    }

    /** @test */
    public function index_menampilkan_halaman_dengan_paginasi()
    {
        // Arrange
        Fasilitas::factory()->count(3)->create();

        // Act
        $res = $this->get('/admin/fasilitas');

        // Assert
        $res->assertStatus(200);
        $res->assertViewHas('fasilitas');
    }

    /** @test */
    public function store_berhasil_menyimpan_fasilitas_dengan_foto_dan_images()
    {
        // Arrange
        $foto   = UploadedFile::fake()->image('cover.jpg', 400, 300);
        $imgA   = UploadedFile::fake()->image('a.jpg', 200, 200);
        $imgB   = UploadedFile::fake()->image('b.jpg', 200, 200);
        
        // Act
        $res = $this->post('/admin/fasilitas', [
            'title'       => 'Kolam Renang',
            'slug'        => null,
            'description' => 'Deskripsi fasilitas',
            'foto'        => $foto,
            'images'      => [$imgA, $imgB],
        ]);

        // Assert
        $res->assertRedirect();
        $this->assertDatabaseHas('fasilitas', [
            'title' => 'Kolam Renang',
        ]);

        $row = Fasilitas::latest('id')->first();
        $this->assertNotNull($row);
        $this->assertNotEmpty($row->foto);

        if (Schema::hasColumn($row->getTable(), 'images')) {
            $decoded = json_decode($row->images ?? '[]', true);
            $this->assertIsArray($decoded);
            $this->assertCount(2, $decoded);
        }
    }

    /** @test */
    public function show_mengembalikan_json_normalisasi_images()
    {
        // Arrange
        $images = ['upload/fasilitas/x.jpg', 'upload/fasilitas/y.jpg'];
        $row = Fasilitas::create([
            'title' => 'Gym',
            'slug'  => 'gym',
            'description' => 'desc',
            'foto'  => 'upload/fasilitas/cover.jpg',
            'images'=> json_encode($images),
        ]);

        // Act
        $res = $this->get("/admin/fasilitas/{$row->id}");

        // Assert
        $res->assertOk()->assertJsonFragment([
            'id'    => $row->id,
            'title' => 'Gym',
        ]);
        $json = $res->json();
        $this->assertIsArray($json['images']);
        $this->assertSame($images, $json['images']);
    }

    /** @test */
    public function update_mengganti_field_dan_menghapus_images_dengan_delete_indexes()
    {
        // Arrange: buat 3 file palsu di public/upload/fasilitas dan simpan pathnya di DB
        $files = [];
        foreach (['a.jpg', 'b.jpg', 'c.jpg'] as $name) {
            $full = $this->uploadDir . DIRECTORY_SEPARATOR . $name;
            file_put_contents($full, 'test');
            $files[] = 'upload/fasilitas/' . $name; // path relatif seperti di controller
        }

        $row = Fasilitas::create([
            'title' => 'Lounge',
            'slug'  => 'lounge',
            'description' => 'awal',
            'foto'  => 'upload/fasilitas/old.jpg',
            'images'=> json_encode($files),
        ]);

        // Act: hapus index 0 dan 2
        $res = $this->put("/admin/fasilitas/{$row->id}", [
            'title'          => 'Lounge Baru',
            'slug'           => 'lounge-baru',
            'description'    => 'update',
            'delete_indexes' => '0,2',
            // tanpa upload baru
        ]);

        // Assert
        $res->assertRedirect();
        $row->refresh();

        $decoded = json_decode($row->images ?? '[]', true);
        $this->assertIsArray($decoded);
        $this->assertCount(1, $decoded); // tinggal 1
        $this->assertSame('upload/fasilitas/b.jpg', $decoded[0]);

        // file index 0 & 2 harus terhapus dari disk
        $this->assertFileDoesNotExist(public_path('upload/fasilitas/a.jpg'));
        $this->assertFileDoesNotExist(public_path('upload/fasilitas/c.jpg'));
    }

    /** @test */
    public function update_menerima_alias_delete_ids_tanpa_mengubah_variabel_yang_ada()
    {
        // Arrange
        $files = [];
        foreach (['a2.jpg', 'b2.jpg'] as $name) {
            $full = $this->uploadDir . DIRECTORY_SEPARATOR . $name;
            file_put_contents($full, 'test');
            $files[] = 'upload/fasilitas/' . $name;
        }

        $row = Fasilitas::create([
            'title' => 'Sauna',
            'slug'  => 'sauna',
            'description' => 'awal',
            'foto'  => null,
            'images'=> json_encode($files),
        ]);

        // Act: gunakan delete_ids (alias) -> hapus index 1
        $res = $this->put("/admin/fasilitas/{$row->id}", [
            'title'       => 'Sauna',
            'slug'        => 'sauna',
            'description' => 'awal',
            'delete_ids'  => '1',
        ]);

        // Assert
        $res->assertRedirect();
        $row->refresh();

        $decoded = json_decode($row->images ?? '[]', true);
        $this->assertIsArray($decoded);
        $this->assertCount(1, $decoded);
        $this->assertSame('upload/fasilitas/a2.jpg', $decoded[0]);
        $this->assertFileDoesNotExist(public_path('upload/fasilitas/b2.jpg'));
    }

    /** @test */
    public function update_bisa_menambah_images_baru()
    {
        // Arrange
        $row = Fasilitas::create([
            'title' => 'Rooftop',
            'slug'  => 'rooftop',
            'description' => 'awal',
            'foto'  => null,
            'images'=> json_encode([]),
        ]);

        $img1 = UploadedFile::fake()->image('new1.jpg', 300, 200);
        $img2 = UploadedFile::fake()->image('new2.jpg', 300, 200);

        // Act
        $res = $this->put("/admin/fasilitas/{$row->id}", [
            'title'       => 'Rooftop',
            'slug'        => 'rooftop',
            'description' => 'awal',
            'images'      => [$img1, $img2],
        ]);

        // Assert
        $res->assertRedirect();
        $row->refresh();

        $decoded = json_decode($row->images ?? '[]', true);
        $this->assertIsArray($decoded);
        $this->assertCount(2, $decoded);
        $this->assertStringStartsWith('upload/fasilitas/', $decoded[0]);
        $this->assertStringStartsWith('upload/fasilitas/', $decoded[1]);
    }

    /** @test */
    public function validasi_menolak_file_non_image_pada_images_per_item()
    {
        // Arrange
        $row = Fasilitas::create([
            'title' => 'Skybar',
            'slug'  => 'skybar',
            'description' => 'awal',
        ]);

        $fakeTxt = UploadedFile::fake()->create('not-image.txt', 1, 'text/plain');

        // Act
        $res = $this->put("/admin/fasilitas/{$row->id}", [
            'title'       => 'Skybar',
            'slug'        => 'skybar',
            'description' => 'awal',
            'images'      => [$fakeTxt],
        ]);

        // Assert: harus gagal validasi
        $res->assertSessionHasErrors(['images.*']);
    }
}
