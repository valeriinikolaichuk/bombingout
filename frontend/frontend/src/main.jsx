import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
//import './index.css'
//import App from './App.jsx'
import PopupContent from "./PopupContent.jsx";
import FullPageApp from "./FullPageApp.jsx";

const mounts = [
    { id: "popup-root", component: <PopupContent /> },
    { id: "react-root", component: <FullPageApp /> },
];

mounts.forEach(({ id, component }) => {
    const el = document.getElementById(id);
    if (el) ReactDOM.createRoot(el).render(component);
});
