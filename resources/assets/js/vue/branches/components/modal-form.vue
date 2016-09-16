<template>
	<div id="newLocation" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">{{ modalTitle }}</h4>
	            </div>
	            <div class="modal-body">
	                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
	                    <form class="form-horizontal">
	                        <div class="form-group">
	                            <div class="col-md-12">
	                                <div class="required-wrapper form-field">
	                                	<small>Vùng kinh doanh</small>
	                                    <multiselect
	                                        :options="locations"
	                                        :type="json"
	                                        :selected.sync="location_ids"
	                                        :multiple="true"
	                                        :searchable="true"
	                                        :local-search="true",
	                                        :allow-empty="true"
	                                        v-on:update="locationSelected"
	                                        :hide-selected="true",
	                                        :close-on-select="false",
	                                        deselect-label="Bỏ chọn"
	                                        select-label="Enter để chọn"
	                                        label="name"
	                                        key="id"
	                                        placeholder="Vùng kinh doanh">
	                                    </multiselect>
	                                </div>

	                                <div class="required-wrapper form-field">
	                                	<small>Mã chi nhánh</small>
	                                    <input type='text' v-model='item.code'
	                                        class='form-control input-sm'
	                                        value=''
	                                        placeholder='Mã chi nhánh'
	                                        v-validate:code="{
	                                            required: {rule: true, message: 'Mã chi nhánh không được để trống'},
	                                            maxlength: {rule: 11, message: 'Không được quá 11 ký tự'},
	                                            minlength: {rule: 5, message: 'Không được nhỏ hơn 5 ký tự'},
	                                        }" />
	                                    <span class="error" v-if="$validation.code.errors && isError">{{ $validation.code.errors[0].message  }}</span>
	                                </div>

	                                <div class="required-wrapper form-field">
	                                	<small>Tên chi nhánh</small>
	                                    <input type='text' v-model='item.name'
	                                        class='form-control input-sm'
	                                        placeholder='Tên chi nhánh'
	                                        v-validate:name="{
	                                            required: {rule: true, message: 'Tên chi nhánh không được bỏ trống'},
	                                            maxlength: {rule: 50, message: 'Không được quá 50 ký tự'},
	                                            minlength: {rule: 2, message: 'Không được nhỏ hơn 2 ký tự'},
	                                        }"
	                                    />
	                                    <span class="error" v-if="$validation.name.errors && isError">{{ $validation.name.errors[0].message  }}</span>
	                                </div>

	                                <div class="required-wrapper form-field">
	                                	<small>Địa chỉ</small>
	                                    <input type='text' v-model='item.address'
	                                        class='form-control input-sm'
	                                        placeholder='Địa chỉ'
	                                        v-validate:address="{
	                                            required: {rule: true, message: 'Địa chỉ chi nhánh không được bỏ trống'}
	                                        }"
	                                    />
	                                    <span class="error" v-if="$validation.address.errors && isError">{{ $validation.address.errors[0].message  }}</span>
	                                </div>

	                                <div class="required-wrapper form-field">
	                                	<small>Điện thoại</small>
	                                    <input type='text' v-model='item.phone'
	                                        placeholder='Điện thoại'
	                                        class='form-control input-sm'
	                                    />
	                                </div>

	                                <div class="required-wrapper form-field">
	                                	<small>Fax</small>
	                                    <input type='text' v-model='item.fax'
	                                        placeholder='Số Fax'
	                                        class='form-control input-sm'
	                                    />
	                                </div>

	                                <div class="required-wrapper form-field">
	                                	<small>Website</small>
	                                    <input type='text' v-model='item.website'
	                                        placeholder='Website'
	                                        class='form-control input-sm'
	                                    />
	                                </div>

	                                <small>Trạng thái </small>
	                                <div class="required-wrapper form-field">
	                                    <div class="checkbox checkbox-success checkbox-inline">
	                                        <input type="checkbox" id="inlineCheckbox2" v-model='item.status'>
	                                        <label for="inlineCheckbox2">Đang hoạt động</label>
	                                    </div>
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
	import Multiselect from 'vue-multiselect';
	export default {
		props: {
            item: {},
            errors: {},
            locations: [],
            modalTitle: '',
            location_ids: []
        },

        data: function () {
            return {
                isError: false,
            }
        },

        methods: {
            locationSelected: function (selected) {
                this.location_ids = selected;
            },

            postForm: function () {
                this.errors = {};
                var self = this;
                this.$validate(true, function () {
                    if (self.$validation.invalid) {
                        self.isError = true;
                    } else {
                        self.isError = false;
                        self.item._token = token;

                        self.item.location_ids = $.map(self.location_ids, function (val) {
                            return val.id;
                        });

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
            this.$parent.formElement = $('#newLocation');
        },

        components: { Multiselect }
	}
</script>