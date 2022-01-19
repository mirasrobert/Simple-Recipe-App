// Get a reference to the file input element
const inputElement = document.querySelector('input[type="file"]');

// const editor = {
//
//     // Called by FilePond to edit the image
//     // - should open your image editor
//     // - receives file object and image edit instructions
//     open: (file, instructions) => {
//         // open editor here
//         console.log(file);
//     },
//
//     // Callback set by FilePond
//     // - should be called by the editor when user confirms editing
//     // - should receive output object, resulting edit information
//     onconfirm: (output) => {
//     },
//
//     // Callback set by FilePond
//     // - should be called by the editor when user cancels editing
//     oncancel: () => {
//     },
//
//     // Callback set by FilePond
//     // - should be called by the editor when user closes the editor
//     onclose: () => {
//     }
// }

// Create a FilePond instance
const pond = FilePond.create(inputElement, {
    acceptedFileTypes: ['image/*'],
    onaddfilestart: (file) => {
        isLoadingCheck(pond, '#register-form');
    },
    onprocessfile: (file) => {
        isLoadingCheck(pond, '#register-form');
    },
    server: {
        url: '/upload_file',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': "XMLHttpRequest"
        }
    },
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    allowImageExifOrientation: true,
    allowImageResize: true,
    allowImageCrop: true,
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
    // imageEditIconEdit: '<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><path d="M8.5 17h1.586l7-7L15.5 8.414l-7 7V17zm-1.707-2.707l8-8a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-8 8A1 1 0 0 1 10.5 19h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 .293-.707z" fill="currentColor" fill-rule="nonzero"></path></svg>',
    // // Use Doka.js as image editor
    // imageEditEditor: editor
});

// Check if file is uploading
function isLoadingCheck(pond = pond, formId) {
    let button = $(formId + ' button[type="submit"]');
    var isLoading = pond.getFiles().filter(x => x.status !== 5).length !== 0;
    if (isLoading) {
        button.attr("disabled", "disabled");
    } else {
        button.removeAttr("disabled");
    }
}
