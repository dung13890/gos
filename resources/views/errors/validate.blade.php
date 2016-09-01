<div v-if="isErrorServer">
    <div class="alert alert-danger" v-if="typeof errors === 'string'">
        <strong>Lỗi!</strong>
        @{{ errors }}
    </div>

    <div class="alert alert-danger" v-else>
        <li v-for="error in errors"> @{{ error }} </li>
    </div>
</div>
