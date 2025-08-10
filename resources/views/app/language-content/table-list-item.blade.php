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
                  <div class="dropdown-menu">
                      <button class="dropdown-item identifier" onclick="onEdit(event)">Edit</button>
                      <button class="dropdown-item text-danger langid" data-lang-id="" onClick="remove(this)">Remove</button>
                  </div>
              </div>
          </td>
          <td class="lang_id text-wrap">
              perusahaan
          </td>
          <td class="content_id text-wrap">
              Perusahaan
          </td>
          <td class="content_en text-wrap">
              Company
          </td>
          <td class="group_name">
              <span class="badge border border-primary text-primary">
                  menu
              </span>
          </td>
          {{-- <td class="is_active">
              <span class="badge bg-success-subtle text-success text-uppercase">Active</span>
          </td> --}}
        </tr>
    </table>
</div>