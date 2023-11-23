const view = `
<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"
    <div class="dz-details">
      <div class="dz-thumbnail">
         <img data-dz-thumbnail alt="" src="">
         <span class="dz-nopreview">No preview</span>
         <div class="dz-success-mark"></div>
         <div class="dz-error-mark"></div>
         <div class="dz-error-message"><span data-dz-errormessage></span></div>
         <div class="progress">
            <div class="progress-bar progress-bar-primary"
               role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress
               style="width: 100%;">
            </div>
         </div>
      </div>
      <div class="dz-filename" data-dz-name></div>
      <div class="dz-size" data-dz-size>
      <a class="dz-remove" href="javascript:undefined;" data-dz-remove>Remove file</a>
    </div>
</div>
`;


if (document.querySelector('#dropzone-basic')) {
    const myDropzone = new Dropzone('#dropzone-basic', {
        previewTemplate: view,
        parallelUploads: 1,
        maxFilesize: 5,
        addRemoveLinks: true,
    maxFiles: 4,
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute(
            'content')
        }
    });

    myDropzone.on("complete", function(file) {
        setTimeout(() => {
            window.livewire.emit('refresh-images');
            myDropzone.removeFile(file);
        }, 4000);
    });
}
