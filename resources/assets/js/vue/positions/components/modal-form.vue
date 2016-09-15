<template>
<div id="newPosition" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <validator name="validation">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <small>Mã chức vụ</small>
                                    <input type='text' v-model='item.code'
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:code="{
                                            required: {rule: true, message: 'Mã chức vụ không được bỏ trống'},
                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
                                            minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'}
                                        }"
                                    />
                                    <span class="error" v-if="$validation.code.errors && isError">{{ $validation.code.errors[0].message }}</span>
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên chức vụ</small>
                                    <input type='text' v-model='item.name'
                                        class='form-control input-sm'
                                        value=''
                                        v-validate:name="{
                                            required: {rule: true, message: 'Tên chức vụ không được bỏ trống'},
                                            maxlength: {rule: 200, message: 'Không được quá 200 ký tự'},
                                            minlength: {rule: 2, message: 'Không được quá 2 ký tự'},
                                        }"
                                    />
                                    <span class="error" v-if="$validation.name.errors && isError">{{ $validation.name.errors[0].message }}</span>
                                </div>

                                <div v-show="errors.errors" class="alert alert-danger animated jello">
		                            <ul>
		                                <li v-for="error in errors.messages">{{ error }}</li>
		                            </ul>
		                        </div>
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="button" v-on:click.prevent="postForm">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu lại
                            </button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Hủy bỏ</button>
                        </div>
                    </form>
                </validator>
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
                this.errors = {};
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        self.isError = true;
                    } else {
                        self.item._token = token;

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
            this.$parent.formElement = $('#newPosition');
        }
    }
</script>