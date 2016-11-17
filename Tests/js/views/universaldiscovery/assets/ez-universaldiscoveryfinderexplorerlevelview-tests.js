/*
 * Copyright (C) eZ Systems AS. All rights reserved.
 * For full copyright and license information view LICENSE file distributed with this source code.
 */
YUI.add('ez-universaldiscoveryfinderexplorerlevelview-tests', function (Y) {
    var  renderTest,
    Assert = Y.Assert, Mock = Y.Mock;

    renderTest = new Y.Test.Case({
        name: 'eZ Universal Discovery Finder Explorer render tests',

        setUp: function () {
            this.view = new Y.eZ.UniversalDiscoveryFinderExplorerLevelView();
        },

        tearDown: function () {
            this.view.destroy();
            delete this.view;

        },

        "Should use the template": function () {
            var origTpl = this.view.template,
                templateCalled = false;

            this.view.template = function () {
                templateCalled = true;
                return origTpl.apply(this, arguments);
            };
            this.view.render();

            Assert.isTrue(
                templateCalled, "The template should have been used to render the view"
            );
        },
    });


    Y.Test.Runner.setName("eZ Universal Discovery Finder Explorer Level View tests");
    Y.Test.Runner.add(renderTest);


}, '', {requires: ['test', 'view', 'ez-universaldiscoveryfinderexplorerlevelview']});
