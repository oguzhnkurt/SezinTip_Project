import React from 'react';
import ReactDOM from 'react-dom';
import SplineViewer from './components/SplineViewer';

function App() {
    return (
        <div>
            <SplineViewer />
            <button className="button" onClick={() => window.location.href = "/login"}><span>SZN Portal </span></button>
        </div>
    );
}

ReactDOM.render(<App />, document.getElementById('react-root'));
