import Student from '../models/Student';
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
    const { nama, nim, email, jurusan } = req.body;

    const students = await Student.create({
      nama: nama,
      nim: nim,
      email: email,
      jurusan: jurusan,
    }) 
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

export default object;
