/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import Vuex from 'vuex'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.use(Vuex)



require('./bootstrap');

window.Vue = require('vue');
// window.eventBus = new Vue();


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('contact-form-component', require('./components/ContactFormComponent.vue').default);

Vue.component('messanger-component', require('./components/MessangerComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
    state: {
        messages: [],
        selectedConversation: null,
        conversations: [],
        querySearch: "",
    },
    mutations: {
        newMessagesList(state, messages) {
            state.messages = messages;
        },
        addNewMessage(state, message) {
            state.messages.push(message);
        },
        selectConversation(state, conversation) {
            state.selectedConversation = conversation;
        },
        newQuerySearch(state, newValue) {
            state.querySearch = newValue;
        },
        newConversationsList(state, conversations) {
            state.conversations = conversations;
        }
    },
    actions: {
        getMessages(context, conversation) {
            axios
                .get("/api/messages?contact_id=" + conversation.contact_id)
                .then(response => {
                    // console.log(response.data);
                    context.commit('selectConversation', conversation);
                    context.commit("newMessagesList", response.data);
                    // this.$store.state.messages = response.data;
                });
        },
        getConversations(context) {
            axios.get("/api/conversations").then(response => {
                // console.log(response.data);
                context.commit("newConversationsList", response.data);
            });
        }
    },
    getters: {
        conversationFiltered(state) {
            return state.conversations.filter(conversation => {
                return (
                    !state.querySearch ||
                    conversation.contact_name
                        .toLowerCase()
                        .indexOf(state.querySearch.toLowerCase()) > -1
                );
            });
        }
    }
});

const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout() {
            document.getElementById('logout-form').submit();
        }
    }
});
