<template>
    <div id="newCategory" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ modalTitle }}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <validator name="validation">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="required-wrapper form-field">
                                        <small>Tên nhóm</small>
                                        <input type='text' v-model='item.name' 
                                            class='form-control input-sm'
                                            v-validate:name="{
                                                required: {rule: true, message: 'Tên nhóm không được để trống'},
                                                maxlength: {rule: 200, message: 'Không được quá 200 ký tự'}
                                            }"
                                        />
                                        <span class="error" v-if="$validation.name.errors && isError">
                                            {{ $validation.name.errors[0].message }}
                                        </span>
                                    </div>

                                    <div class="required-wrapper form-field">
                                        <small>Slug</small>
                                        <input type='text' v-model='item.slug' 
                                            class='form-control input-sm'
                                            v-validate:slug="{
                                                required: {rule: true, message: 'Slug không được để trống'},
                                                maxlength: {rule: 200, message: 'Không được quá 200 ký tự'}
                                            }"
                                        />
                                        <span class="error" v-if="$validation.slug.errors && isError">
                                            {{ $validation.slug.errors[0].message }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div v-show="errors.errors" class="alert alert-danger animated jello">
                                <ul>
                                    <li v-for="error in errors.messages">{{ error }}</li>
                                </ul>
                            </div>

                            <div class="form-group text-center">
                                <a class="btn btn-success" v-on:click.prevent="postForm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                                </a>

                                <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Xóa</button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                            </div>
                        </validator>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    export default {
        props: {
            item: {},
            type: '',
            errors: {},
            modalTitle: '',
        },

        data: function () {
            return {
                isError: false,
            }
        },

        methods: {
            postForm: function () {
                var self = this;
                this.errors = {};
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        self.isError = true;
                    } else {
                        self.isError = false;
                        self.item._token = token;
                        self.item.type = self.type;
                        if (self.item.id) {
                            self.$parent.update(self.item, self.item.id);
                        } else {
                            self.$parent.store(self.item);
                        }
                    }
                });
            }
        },
        
        ready: function () {
            this.$parent.formElement = $('#newCategory');
        }
    }
</script>