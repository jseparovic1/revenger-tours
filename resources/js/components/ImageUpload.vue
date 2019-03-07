<template>
    <div class="form-control">
        <label for="file" v-html="label"></label>
        <div v-for="(file, index) in this.input">
            <input type="text" name="file[]" :value="file.name" :data-index="index" hidden/>
        </div>
        <vue-dropzone
            ref="dropzone"
            id="dropzone"
            :options="dropzoneOptions"
            @vdropzone-file-added="handleImageUpload"
            @vdropzone-removed-file="handleImageDelete"
            @vdropzone-max-files-exceeded="handleMaxFilesExceeded"
            @vdropzone-sending="attachPayloadToFile"
            @vdropzone-mounted="attachExistingFiles"
            @vdropzone-success="handleUploadSuccess"
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
                default: () => [],
            },
            label: {
                type: String,
            },
            resourceId: {
              type: String,
            },
            resource: {
                type: String,
            },
            collectionName: {
                type: String,
            },
            isEditAction: {
                type: Boolean,
                default: false,
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
                },
                input: [],
            }
        },
        methods: {
            attachExistingFiles: function () {
                if (this.images.length === 0) {
                    return;
                }
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
            },
            handleImageDelete: function(file) {
                console.log("delete");
                console.log(file);
            },
            handleMaxFilesExceeded: function(file) {
                this.$refs.dropzone.removeAllFiles();
                this.$refs.dropzone.manuallyAddFile(file);
            },
            handleUploadSuccess: function(file, response) {
                this.input.push({
                    'name' : response.name,
                    'originalName': response.originalName
                });
            },
            attachPayloadToFile: function(file, xhr, formData) {
                if (this.isEditAction) {
                    formData.append("resourceId", this.resourceId);
                    formData.append("resource", this.resource);
                    formData.append("collectionName", this.collectionName);
                }

                formData.append("_token", window.csrfToken.content);
            }
        }
    }
</script>
