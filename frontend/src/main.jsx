import { createRoot } from 'react-dom/client';
import PopupContent from "./PopupContent";

const mounts = [
    { id: "popup-root", component: <PopupContent /> },
];

mounts.forEach(({ id, component }) => {
    const el = document.getElementById(id);
    if (el) {
        const root = createRoot(el);
        root.render(component);
    }
});
