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
              <a href="javascript:void(0);" class="fw-medium link-primary"></a>
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
          <td class="full_name text-wrap">
              perusahaan
          </td>
          <td class="role text-wrap">
              Perusahaan
          </td>
          <td class="email text-wrap">
              Company
          </td>
        </tr>
    </table>
</div>