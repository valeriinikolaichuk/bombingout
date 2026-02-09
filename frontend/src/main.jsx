import { createRoot } from 'react-dom/client';
import PopupContent from "./PopupContent";
import PageContent from "./PageContent";

const mounts = [
    { id: "popup-root", component: <PopupContent /> },
    { id: "page-root", component: <PageContent /> },
];

mounts.forEach(({ id, component }) => {
    const el = document.getElementById(id);
    if (el) {
        const root = createRoot(el);
        root.render(component);
    }
});
