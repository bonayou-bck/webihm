<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdminRole
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole query()
 */
	class AdminRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property int|null $admin_id
 * @property int|null $category_id
 * @property string|null $title_id
 * @property string $title_en
 * @property string $slug_id
 * @property string $slug_en
 * @property string|null $content_id
 * @property string $content_en
 * @property string|null $cover
 * @property int|null $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContentEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlugEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int|null $blog_id
 * @property string $name_id
 * @property string $name_en
 * @property string $slug_id
 * @property string $slug_en
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blog> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlugEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 */
	class BlogCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlogVisitor
 *
 * @property int $id
 * @property int|null $blog_id
 * @property string|null $ip
 * @property string|null $ua
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogVisitor whereUa($value)
 */
	class BlogVisitor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Certificate
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate query()
 */
	class Certificate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CertificateImage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateImage query()
 */
	class CertificateImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KeyValue
 *
 * @method static \Illuminate\Database\Eloquent\Builder|KeyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KeyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KeyValue query()
 */
	class KeyValue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Lang
 *
 * @property int $id
 * @property string|null $lang_id
 * @property string|null $content_id
 * @property string|null $content_en
 * @property int $group_id
 * @property int|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LangGroup> $group
 * @property-read int|null $group_count
 * @method static \Illuminate\Database\Eloquent\Builder|Lang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereContentEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lang whereUpdatedAt($value)
 */
	class Lang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LangGroup
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LangGroup whereUpdatedAt($value)
 */
	class LangGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LiveIn
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LiveIn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveIn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveIn query()
 */
	class LiveIn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LiveInPeople
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $position
 * @property string|null $cover
 * @property int|null $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople query()
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LiveInPeople whereUpdatedAt($value)
 */
	class LiveInPeople extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

