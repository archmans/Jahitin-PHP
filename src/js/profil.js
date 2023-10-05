document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("confirmationModal");
    var confirmButton = document.getElementById("confirmSave");
    var cancelButton = document.getElementById("cancelSave");
    var form = document.getElementById("form-profil");

    document.getElementById("submit").addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the form from submitting immediately

        // Display the modal when the "Save" button is clicked
        modal.style.display = "block";
    });

    confirmButton.addEventListener("click", function () {
        // Close the modal
        modal.style.display = "none";

        // Serialize the form data
        var formData = new FormData(form);

        // Send an AJAX request to update the profile
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "updateProfile.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Success: Redirect to profile page or show a success message
                    alert('Profil berhasil disimpan!');
                    window.location.href = 'profilPage.php';
                } else {
                    // Error: Handle the error or show an error message
                    alert('masukkan data dengan benar, profil gagal diupdate!');
                }
            }
        };
        xhr.send(formData);
    });

    cancelButton.addEventListener("click", function () {
        // Close the modal if the user cancels
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        // Close the modal if the user clicks outside of it
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
});
