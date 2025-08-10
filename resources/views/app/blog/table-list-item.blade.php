<div hidden>
    <table>
        {{-- title_id, category_name_id, status, created_by, created_at --}}
        <tr class="item-template">
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="chk_child"
                        value="option1">
                </div>
            </th>
            <td class="id" style="display:none;">
                <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
            </td>
            <td class="text-center">
                <div class="">
                    <button class="btn btn-outline-primary btn-sm btn-icon" type="button"
                        data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ri-apps-2-line"></i>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item slug data-status" onclick="onEdit(event)">Edit</button>
                        <button class="dropdown-item data-id data-status2" onclick="onSendDraft(event)">Send to draft</button>
                        <button class="dropdown-item">
                            History <span
                                class="badge bg-primary rounded-pill fs-10 ms-2">1</span>
                        </button>
                        {{-- <div class="dropdown-divider"></div> --}}
                        {{-- <button class="dropdown-item text-danger">Remove</button> --}}
                    </div>
                </div>
            </td>
            {{-- <td class="img">
                <img style="width: 40px; height: 40px; object-fit: cover"
                    src="https://itcihutanimanunggal.co.id/wp-content/uploads/2021/03/IFC-1.png"
                    alt="">
            </td> --}}
            <td class="title_id text-wrap">
                KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca
            </td>
            <td class="category_name_id">
                Informasi
            </td>
            <td class="status">
                Rejected
                {{-- <span class="badge bg-danger-subtle text-danger text-uppercase">
                    Rejected
                </span> --}}
            </td>
            <td class="text-end">
                <p class="m-0 created_by_name">Nia</p>
                <small>as <span class="created_by_as">Writer</span></small>
            </td>
            <td class="text-end">
                <p class="m-0 created_at_date">20, Oct 2023 </p>
                <small class="created_at_time">12:22 PM</small>
            </td>
            <td class="text-end">
                <p class="m-0 updated_at_date">20, Oct 2023 </p>
                <small class="updated_at_time">12:22 PM</small>
            </td>
        </tr>
    </table>
</div>
