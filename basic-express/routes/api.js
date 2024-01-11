import { Router } from 'express';
import StudentController from '../controllers/StudentController.js';

const router = Router();

router.get('/', (req, res) => {
    res.send("Hello Express");
});

router.get('/students', StudentController.index);
router.post('/students', StudentController.store);
router.put('/students/:id', StudentController.update);
router.delete('/students/:id', StudentController.destroy);
router.get('/students/:id', StudentController.show);

export default router;