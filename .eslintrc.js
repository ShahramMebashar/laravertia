module.exports = {
    extends: [
        "eslint:recommended",
        "plugin:@typescript-eslint/eslint-recommended",
        "plugin:vue/vue3-recommended",
        "prettier",
    ],
    rules: {
        "vue/multi-word-component-names": "off",
        "vue/component-api-style": ["error", ["script-setup", "composition"]],
        "vue/component-name-in-template-casing": "error",
        "vue/block-lang": ["error", { script: { lang: "ts" } }],
        "vue/define-macros-order": [
            "error",
            {
                order: ["defineProps", "defineEmits"],
            },
        ],
        "vue/no-undef-components": "error",
        "vue/no-unused-refs": "error",
        "vue/no-v-html": "off",
        "no-undef": "off",
        "no-unused-vars": "off",
    },
    ignorePatterns: ["*.d.ts", "**/*.css","**/*.scss"],
    parser: "vue-eslint-parser",
    parserOptions: {
        parser: "@typescript-eslint/parser",
    },
}
