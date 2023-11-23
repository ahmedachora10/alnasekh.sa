
function filePond(element, options = {}) {

    if (!FilePond) {
        return console.error('There is no FilePond Fount');
    }

    const pond_thumbnails = FilePond.create(element, {
        allowImagePreview: true,
        credits: false,
        ...options
    });

    return {
        setOptions: (url) => {
            pond_thumbnails.setOptions({
                server: {
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute(
                            'content')
                    }
                },
                maxFiles: 1,
                allowMultiple: false,
            });
        },

        preview: function(fullpath_image, image_name = '', name = 'image') {
            pond_thumbnails.addFile(fullpath_image);
            this.addInputImage(image_name, name);
        },

        addInputImage: (image_name, name) => {
            return document.addEventListener('FilePond:init', (e) => {
                const input_field = Array.from(document.querySelectorAll('[name=' + name + ']'))[1];
                input_field.value = image_name;
            });

        }
    }
}
