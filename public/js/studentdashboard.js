// Handle profile picture upload
const profilePicUpload = document.getElementById('profile-pic-upload');
profilePicUpload.addEventListener('change', () => {
    // Get selected file
    const file = profilePicUpload.files[0];
    // Create a new FileReader object
    const reader = new FileReader();
    // Set the FileReader to run when the file is loaded
    reader.onload = () => {
        // Get the base64-encoded string of the file contents
        const base64String = reader.result.replace('data:', '').replace(/^.+,/, '');
        // Save the base64-encoded string to localStorage
        localStorage.setItem('profilePic', base64String);
        // Update the profile picture in the navbar
        const profilePic = document.getElementById('profile-pic');
        profilePic.setAttribute('src', 'data:image/png;base64,' + base64String);
    };
    // Read the file contents as a data URL
    reader.readAsDataURL(file);
});

// Set the profile picture from localStorage, if available
const profilePic = document.getElementById('profile-pic');
const profilePicData = localStorage.getItem('profilePic');
if (profilePicData) {
    profilePic.setAttribute('src', 'data:image/png;base64,' + profilePicData);
}
