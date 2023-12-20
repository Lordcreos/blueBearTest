import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import TitleHead from './Pages/components/Title.vue';
import '../css/app.css';

createInertiaApp({
  title: (title) => `${title} | Proyecto digimon`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob("./Pages/**/*.vue")
    ),
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) }).use(plugin).component('TitleHead', TitleHead).mount(el);
  },
});