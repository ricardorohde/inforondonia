/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    config.language = 'pt-br';
    config.skin = 'icy_orange';
    config.filebrowserImageBrowseLinkUrl = '/browser/browse.php';

    config.toolbarGroups = [
        {name: 'document', groups: ['mode', 'document', 'doctools']},
        {name: 'clipboard', groups: ['clipboard', 'undo']},
        {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
        {name: 'tools', groups: ['tools']},
        {name: 'about', groups: ['about']},
        
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
        {name: 'forms', groups: ['forms']},
        {name: 'insert', groups: ['insert']},
        {name: 'links', groups: ['links']},
        
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
        {name: 'styles', groups: ['styles']},
        {name: 'colors', groups: ['colors']},
        {name: 'others', groups: ['others']}
    ];

    config.removeButtons = 'Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Flash,Language';
};