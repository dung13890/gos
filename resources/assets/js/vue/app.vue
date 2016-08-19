<template>
    <div>
        <modal-profile :item="item"></modal-profile>
        <modal-password></modal-password>
    </div>
</template>
<script>
    import ModalProfile from './components/partials/profile.vue';
    import ModalPassword from './components/partials/password.vue';
    import UserService from './services/user';
    export default {
        data: function () {
            return {
                item: {},
                UserService: UserService,
            };
        },
        created: function () {
            UserService.setRouter(window.laroute);
            UserService.setHttp(this.$http);
        },
        methods: {
            profile: function () {
                var self = this;
                UserService.profile().then((item) => {
                    self.item = item;
                });
            },
        },
        ready: function () {
            this.profile();
        },
        components: { ModalProfile, ModalPassword }

    }
</script>