<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-header header-elements-inline pb-2">
                    <h4 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-gear mr-2"></i> <?php echo $title; ?></span>
                    </h4>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="15%">Type</th>
                                <th width="35%">Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select id="type" name="type" data-placeholder="Select group" class="form-control">
                                            <option value="5">Manager</option>
                                            <option value="6">Delivery Man</option>
                                            <option value="7">Accountant</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <a href="#" id="add_user" class="btn  btn-success btn-sm" title="Add User">
                                            <i class="icon-plus-circle2"> </i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="user_list">
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /hover rows -->
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->

<script>
    $(document).ready(function() {

        let load_user = base_url + 'ajax/get_user_access_list';
        $.post(load_user, function(data) {
            if (data) {
                let users = JSON.parse(data);
                users.forEach(user => {
                    add_user(user.user_id, user.type, user.firstName, user.lastName, user.email, user.phone);
                });
            }
        });
    });

    $(document).on('click', '#add_user', function(e) {
        e.preventDefault();

        let type = $('#type').val();
        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();
        let email = $('#email').val();
        let phone = $('#phone').val();

        let url = base_url + 'ajax/add_user_access';

        $.post(url, {
            type,
            firstName,
            lastName,
            email,
            phone
        }, function(user_id) {
            if (user_id) {
                add_user(user_id, type, firstName, lastName, email, phone);
                $('#firstName, #lastName, #email, #phone').val('');
                alert('User has added successfully!...');
            } else {
                alert('Something went wrong! Please try again...');
            }
        });
    });

    $(document).on('click', '.update_user', function(e) {
        e.preventDefault();
        let user_id = $(this).closest('tr').attr('data-user-id');
        let type = $(this).closest('tr').find('.type').val();
        let firstName = $(this).closest('tr').find('.firstName').val();
        let lastName = $(this).closest('tr').find('.lastName').val();
        let email = $(this).closest('tr').find('.email').val();
        let phone = $(this).closest('tr').find('.phone').val();

        let url = base_url + 'ajax/update_user_access';

        $.post(url, {
            user_id,
            type,
            firstName,
            lastName,
            email,
            phone
        }, function(data) {
            if (data == 1) {
                alert('User has updated successfully!...');
            } else {
                alert('Something went wrong! Please try again...');
            }
        });
    });

    function add_user(user_id, type, firstName, lastName, email, phone) {
        let element = `
            <tr data-user-id="${user_id}">
                <td>
                    <div class="form-group">
                        <select data-placeholder="Select group" class="form-control type">
                            <option value="5">Manager</option>
                            <option value="6">Delivery</option>
                            <option value="7">Accountant</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control firstName" value="${firstName}" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control lastName" value="${lastName}" placeholder="Last Name">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control email" value="${email}" placeholder="Email Address">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control phone" value="${phone}" placeholder="Phone">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <a href="#" class="btn  btn-primary btn-sm update_user" title="Update User">
                            <i class="icon-checkmark"> </i>
                        </a>
                    </div>
                </td>
            </tr>
        `;

        $('#user_list').append(element);
        // $(this).find('type').val(type).change();
        // console.log(element);
    }
</script>