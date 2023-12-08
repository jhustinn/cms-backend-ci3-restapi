<div class="intro-y box lg:mt-5">
    <div class="flex items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Change Password
        </h2>
    </div>
    <div class="p-5">
        <form id="changeUserPassword">
            <div>
                <label>Current Password</label>
                <input type="password" id="password1" required name="old_password" class="input w-full border mt-2"
                    placeholder="Your Current Password">
            </div>
            <div class="mt-3">
                <label>New Password</label>
                <input type="password" id="password1" required name="password1" class="input w-full border mt-2"
                    placeholder="New Password">
            </div>
            <div class="mt-3">
                <label>Confirm New Password</label>
                <input type="password" id="password1" required name="password2" class="input w-full border mt-2"
                    placeholder="Re-enter new password">
            </div>
            <button type="submit" class="button bg-theme-1 text-white mt-4">Change Password</button>
        </form>
    </div>
</div>

<script>
    $('#changeUserPassword').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Profile/changeUserPassword') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    document.getElementById("changeUserPassword").reset();
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )

                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )

                } else if (response.status == 423) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )

                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    `Failed to change password!`,
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });
</script>