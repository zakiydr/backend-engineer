import Student from '../models/Student.js';
class StudentController {
  async index(req, res) {
    const students = await Student.findAll();
    const data = {
      message: "Menampilkan semua students",
      data: students,
    };
    res.json(data);
  }
  async store(req, res) {
    // const { nama, nim, email, jurusan } = req.body;

    const students = await Student.create(req.body) 
    const data = {
      message: `Menambahkan data student`,
      data: students,
    };
    res.json(data);
  }
  async update(req, res) {
    const { id } = req.params;
    
    const student = await Student.findByPk(id);

    if (student) {
      const condition = {
        where: {
          id: id,
        },
      };

      const student = await Student.update(req.body, condition);

      const data = {
        message: "Mengedit data student",
        student: student,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };

      res.status(404).json(data);
    }
  }
  async destroy(req, res) {
    const { id } = req.params;

    const student = await Student.findByPk(id);

    if (student) {
      const condition = {
        where: {
          id: id,
        },
      };

      await Student.destroy(condition);

      const data = {
        message: "Menghapus data student",
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };

      res.status(404).json(data);
    }
  }
  async show(req, res) {
    const { id } = req.params;

    const student = await Student.findByPk(id);

    if (student) {
      const condition = {
        where: {
          id: id,
        },
      };

      const data = {
        message: "Menampilkan detail student",
        data: student
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };

      res.status(404).json(data);
    }
  }
}

const object = new StudentController();

export default object;
