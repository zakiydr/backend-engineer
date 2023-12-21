const students = require('../data/students');

class StudentController {
  index(req, res) {
    const data = {
      message: "Menampilkan semua students",
      data: students,
    };
    res.json(data);
  }
  store(req, res) {
    const { nama } = req.body;
    students.push(nama)
    const data = {
      message: `Menambahkan data students: ${nama}`,
      data: students,
    };
    res.json(data);
  }
  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    // students.splice(id, 1, nama);
    students[id] = nama;
    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: students,
    };
    res.json(data);
  }
  destroy(req, res) {
    const { id } = req.params;

    students.splice(id, 1)
    const data = {
      message: `Menghapus student id ${id}`,
      data: students,
    };
    res.json(data);
  }
}

const object = new StudentController();

module.exports = object;
