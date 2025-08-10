<div hidden>
    <table>
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
            <td class="text-center" style="width: 1%">
                <div class="">
                    <button class="btn btn-outline-primary btn-sm btn-icon" type="button"
                        data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ri-apps-2-line"></i>
                    </button>
                    <div class="dropdown-menu data-ids">
                        <button class="dropdown-item data-id" onclick="onEdit(event)">Edit</button>
                        <button class="dropdown-item data-footer data-id2" onclick="setFooter(event)">Toggle Footer</button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item text-danger data-id3 data-name" onclick="remove(event)">Remove</button>
                    </div>
                </div>
            </td>
            {{-- <td class="img">
                <img style="width: 40px; height: 40px; object-fit: cover"
                    src="https://itcihutanimanunggal.co.id/wp-content/uploads/2021/03/IFC-1.png"
                    alt="">
            </td> --}}
            <td class="is_showcase" style="">
                <p class="m-0 text-wrap name_id" style="min-width: 100px;">
                    Kantor Pusat
                </p>
                <div class="is_footer"></div>
                {{-- <span class="badge bg-success-subtle text-success text-uppercase">
                    In footer
                </span> --}}
            </td>
            <td class="text-wrap">
                <p class="m-0 address_id" style="min-width: 200px;">
                    Jalan Kenangan KM. 1 Jenebora Penajam, Kariangau, Kec. Balikpapan Bar., Kota
                    Balikpapan, Kalimantan Timur 76134
                </p>
            </td>
            <td class="email">
                info@itcihutanimanunggal.co.id
            </td>
            <td class="telephone">
                (0542) 840248
            </td>
            <td class="fax">
                (05442) 840216
            </td>
            {{-- <td class="status">
                <span
                    class="badge bg-success-subtle text-success text-uppercase is_active">Active</span>
            </td> --}}
            <td class="text-end">
                <p class="m-0">Admin</p>
                <small>as Superadmin</small>
            </td>
            <td class="text-end">
                {{-- 20, Oct 2023 --}}
                {{-- 12:22 PM --}}
                <p class="m-0 created_at_date">20, Oct 2023 </p>
                <small class="created_at_time">12:22 PM</small>
            </td>
        </tr>
    </table>
</div>