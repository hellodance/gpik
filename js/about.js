window.app = window.app || {};      // Healthify namespace definition

$(function() {
    var Router = Backbone.Router.extend({
        routes: {
            ':tab': 'selectTab',
            '*actions': 'basePage'
        },

        selectTab: function (item) {
            $('[href=' + "#" + item + ']').tab('show');
        },
    });
    var router = new Router();
    Backbone.history.start();
});
