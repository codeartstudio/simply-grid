"use strict";

// Component Definition
var CAGrid = function(elementId, options) {
    // Main object
    var the = this;

    // Get element object
    var element = document.getElementById(elementId);
    if (!element) {
        return;
    }

    // Default options
    var defaultOptions = {
        data: {
            type: 'local',
            saveState: false,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },
        layout: {
            scroll: false
        },
        // column sorting
        sortable: false,
        pagination: false,
    };

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        /**
         * Run plugin
         * @returns {CAGrid}
         */
        construct: function(options) {
            // reset header
            Plugin.init(options);

            // build header
            Plugin.build();

            return the;
        },

        /**
         * Handles subheader click toggle
         * @returns {CAGrid}
         */
        init: function(options) {
            the.element = element;
            the.events = [];

            // merge default and user defined options
            the.options = {...defaultOptions, ...options};
        },

        /**
         * Reset header
         * @returns {CAGrid}
         */
        build: function() {
            $(the.element).KTDatatable(the.options);
        },
    };

    //////////////////////////
    // ** Public Methods ** //
    //////////////////////////

    /**
     * Set default options
     */

    the.setDefaults = function(options) {
        defaultOptions = options;
    };

    ///////////////////////////////
    // ** Plugin Construction ** //
    ///////////////////////////////

    // Run plugin
    Plugin.construct.apply(the, [options]);

    // Return plugin instance
    return the;
};

// webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = CAGrid;
}