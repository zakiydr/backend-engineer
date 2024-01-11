import express, { json, urlencoded } from 'express';

import router from "./routes/api.js";
// import router from "../routes/api.js"; // Update the import statement


const app = express();
const port = 3000;

app.use(json());
app.use(urlencoded({extended: true})); 

app.use(router);

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});