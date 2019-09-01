var markdownEditor;

$( document ).ready(function() {
    var editorEl = document.querySelector('#editSection');
    if (editorEl) {
        markdownEditor = new tui.Editor({
            el: document.querySelector('#editSection'),
            initialEditType: 'markdown',
            previewStyle: 'vertical',
            height: '300px'
        });
    
        markdownEditor.setValue( document.querySelector('#editorContent').innerHTML );
    }
});

$('#redactor').redactor({
    imageUpload: '/ajax/redactor/core/uploadImage/',
    fileUpload: '/ajax/redactor/core/uploadFile/',
    plugins: ['table', 'video', 'source'],
    imagePosition: true,
    imageResizable: true
});

initProfileButtonClickHandler();

function initProfileButtonClickHandler() {
    let profileButton = document.querySelector('.js-profile-button');
    if (profileButton) {
        profileButton.addEventListener('click', function(e) {
            if (profileButton.classList.contains('is-active')) {
                profileButton.classList.remove('is-active');
            } else {
                profileButton.classList.add('is-active');
            }
        });
    }
}

