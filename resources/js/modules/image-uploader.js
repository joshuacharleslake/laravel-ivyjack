const imageUploader = document.querySelector('.js-image-upload-input');

if ( typeof(imageUploader) != 'undefined' && imageUploader != null ) {

    imageUploader.onchange = function (event) {
        var fileName = this.value.replace('C:\\fakepath\\', '');
        const imageUploaderFileName = event.target.closest('div').getElementsByClassName('js-image-upload-file-name')[0]
        imageUploaderFileName.innerHTML = fileName;
        imageUploaderFileName.closest('p').classList.remove('hidden');
    };

}


