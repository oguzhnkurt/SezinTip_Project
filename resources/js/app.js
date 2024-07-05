import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import SplineViewer from './components/SplineViewer';

function App() {

    useLayoutEffect(() => {
        console.log('SPLINE MARKERŞ ', splineMarker)
        // const splineMarker = document.querySelector('#logo');
        // splineMarker.remove();
    }, [])

    return (
        <div>
            <button className="button" onClick={() => window.location.href = "/login"}><span>SZN Portal </span></button>
        </div>
    );
}

ReactDOM.render(<App />, document.getElementById('react-root'));
