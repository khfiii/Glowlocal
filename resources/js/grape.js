import grapesjs from "grapesjs";
import grapejblock from "grapesjs-blocks-basic";
import grapertelayout from "grapesjs-rte-extensions";
import pluginCountdown from "grapesjs-component-countdown";
import customCodePlugin from "grapesjs-custom-code";
import pluginTypedjs from "grapesjs-typed";
import "grapesjs/dist/css/grapes.min.css";
import exportPlugin from "grapesjs-plugin-export";
import presetWebpage from "grapesjs-preset-webpage";

const url = window.location.href;

const parts = url.split("/");

const slug = parts.pop() || parts.pop();

const loadEndpoint = `https://ebook.test/api/website/${slug}`;
const storeEnpoint = `https://ebook.test/api/store/website/${slug}`;

// const loadEndpoint = `https://glowlocal.shop/api/website/${slug}`;
// const storeEnpoint = `https://glowlocal.shop/api/store/website/${slug}`;

const escapeName = (name) =>
    `${name}`.trim().replace(/([^a-z0-9\w-:/]+)/gi, "-");

const editor = grapesjs.init({
    container: "#gjs",
    height: "100%",
    fromElement: true,
    storageManager: false,
    selectorManager: { escapeName },
    storageManager: {
        type: "remote",
        stepsBeforeSave: 1,
        options: {
            remote: {
                urlLoad: loadEndpoint,
                urlStore: storeEnpoint,
                // The `remote` storage uses the POST method when stores data but
                // the json-server API requires PATCH.
                fetchOptions: (opts) =>
                    opts.method === "POST" ? { method: "PATCH" } : {},
                // As the API stores projects in this format `{id: 1, data: projectData }`,
                // we have to properly update the body before the store and extract the
                // project data from the response result.
                onStore: (data, editor) => {
                    const pagesHtml = editor.Pages.getAll().map((page) => {
                        const component = page.getMainComponent();
                        return {
                            html: editor.getHtml({ component }),
                            css: editor.getCss({ component }),
                        };
                    });
                    return { id: slug, data, pagesHtml };
                },
                onLoad: (result) => result.data,
            },
        },
    },
    plugins: [
        grapejblock,
        grapertelayout,
        pluginCountdown,
        pluginTypedjs,
        customCodePlugin,
        exportPlugin,
        presetWebpage,
        "@silexlabs/grapesjs-filter-styles",
    ],
    pluginsOpts: {
        [customCodePlugin]: {
            // options
        },
        [exportPlugin]: {
            // options
        },
        "grapesjs-tailwind": {
            tailwindPlayCdn: null,
        },

        "grapesjs-rte-extensions": {
            // default options
            base: {
                bold: true,
                italic: true,
                underline: true,
                strikethrough: true,
                link: true,
            },
            fonts: {
                fontColor: true,
                hilite: true,
            },
            format: {
                heading1: true,
                heading2: true,
                heading3: true,
                heading4: false,
                heading5: false,
                heading6: false,
                paragraph: true,
                quote: false,
                clearFormatting: true,
            },
            subscriptSuperscript: false, //|true
            indentOutdent: false, //|true
            list: false, //|true
            align: true, //|true
            actions: {
                copy: true,
                cut: true,
                paste: true,
                delete: true,
            },
            actions: false, //|true
            undoredo: false, //|true
            extra: false, //|true
            darkColorPicker: true, //|false
            maxWidth: "600px",
        },
    },
});

// editor.BlockManager.add("responsive-3-cols", {
//     label: "3 Columns",
//     content: `
//         <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" data-gjs-droppable="true">
//             <div class="p-4" data-gjs-droppable="true"></div>
//             <div class="p-4" data-gjs-droppable="true"></div>
//             <div class="p-4" data-gjs-droppable="true"></div>
//         </div>
//     `,
//     category: "Columns Management",
// });
// editor.BlockManager.add("responsive-2-cols", {
//     label: "2 Columns",
//     content: `
//         <div class="grid grid-cols-1 sm:grid-cols-2 gap-2" data-gjs-droppable="true">
//             <div class="p-4" data-gjs-droppable="true"></div>
//             <div class="p-4" data-gjs-droppable="true"></div>
//         </div>
//     `,
//     category: "Columns Management",
// });

// editor.BlockManager.add("responsive-1-cols", {
//     label: "1 Columns",
//     content: () => {
//         // Generate a unique ID using Math.random
//         const uniqueId = `col-${Math.random().toString(36).substr(2, 9)}`;

//         return `
//            <div class="flex ${uniqueId} flex-col" data-gjs-droppable="true">
//            <div class="p-6 flex justify-center -mt-8" data-gjs-droppable="true"></div>
//            </div>

//         `;
//     },
//     category: "Columns Management",
// });

// editor.BlockManager.add("Heading", {
//     label: "Heading",
//     content: `<div class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900" data-gjs-dropprable="true">Heading</div>`,
//     category: "Fonts",
// });
