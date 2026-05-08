import './bootstrap';
import { createRoot } from 'react-dom/client';
import ReactApp from './ReactApp';

const reactRoot = document.getElementById('react-root');

if (reactRoot) {
    createRoot(reactRoot).render(<ReactApp />);
}
