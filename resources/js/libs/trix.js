import * as Trix from 'trix/dist/trix';
import 'trix/dist/trix.css';

Trix.config.blockAttributes.heading = {
    tagName: "h2",
    terminal: true,
    breakOnReturn: true,
    group: false
}

Trix.config.blockAttributes.subHeading = {
    tagName: "h3",
    terminal: true,
    breakOnReturn: true,
    group: false
}

export default Trix;
