import React from 'react';
import '@/css/scribbl.css';
import ReactDOM from 'react-dom';

function App() {
    return (
        <h2 css={'white fs-l2 md-fs-xl1 fw-900 lh-2'}>
            This is React!
        </h2>
    );
}

export default App;

if (document.getElementById('react')) {
    ReactDOM.render(<App />, document.getElementById('react'));
}