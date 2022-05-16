import "/vendor/laraberg/css/laraberg.css";
import "/vendor/laraberg/js/laraberg.js";

Laraberg.init('content',
    {
        sidebar: true,
        laravelFilemanager: true,

    });
const myBlock =  {
    title: 'My First Block!',
    icon: 'universal-access-alt',
    category: 'my-category',

    edit() {
        return "<h1>Hello editor.</h1>"
    },

    save() {
        return "<h1>Hello saved content.</h1>"
    }
}

Laraberg.registerBlock('testing_laraberg', myBlock)