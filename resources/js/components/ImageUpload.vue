<template>
    <div class="form-control">
        <label for="upload" v-html="label"></label>
        <vue-dropzone
            ref="dropzone"
            id="dropzone"
            :options="dropzoneOptions"
            @vdropzone-file-added="handleImageUpload"
            @vdropzone-removed-file="handleImageDelete"
            @vdropzone-max-files-exceeded="handleMaxFilesExceeded"
            @vdropzone-sending="attachPayloadToFile"
            @vdropzone-mounted="attachExistingFiles"
            :useCustomSlot=true
        >
        <div class="dropzone-custom-content">
            <h3 class="text-brand text-bold text-lg py-4">Drag and drop to upload content!</h3>
            <div class="subtitle">...or click to select a file from your computer</div>
        </div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
        </vue-dropzone>
    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        name: 'app',
        components: {
            vueDropzone: vue2Dropzone
        },
        props: {
            numberOfImages : {
                type: Number,
                default: 4,
            },
            images: {
                type: Array,
            },
            label: {
                type: String,
            }
        },
        data: function () {
            return {
                dropzoneOptions: {
                    url: '/admin/upload',
                    addRemoveLinks: true,
                    maxFiles: this.numberOfImages,
                    acceptedFiles: 'image/*',
                    thumbnailWidth: 300,
                }
            }
        },
        methods: {
            attachExistingFiles: function () {
                this.images.forEach(image => {
                    axios.get(`/admin/media/${image.id}`)
                        .then(({ data }) => {
                            this.$refs.dropzone.manuallyAddFile({
                                'name': data.name,
                                'size': data.size,
                                'type': data.mimeType
                            }, data.url);
                        });
                });
            },
            handleImageUpload : function (file) {
                console.log("upload");
                // console.log(file)
            },
            handleImageDelete: function(file) {
                console.log("delete");
                console.log(file);
            },
            handleMaxFilesExceeded: function(file) {
                this.$refs.dropzone.removeAllFiles();
                this.$refs.dropzone.manuallyAddFile(file);
            },
            attachPayloadToFile: function(file, xhr, formData) {
                console.log(formData);
                formData.append("resource", "App\\Tour");
                formData.append("resourceId", 1);
                formData.append("collection", "hero_original");
                formData.append("_token", window.csrfToken.content);
            }
        }
    }
</script>
