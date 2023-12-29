import { DataTypes } from "sequelize";
import sequelize from "../config/database";

const Student = define("Student", {
    nama: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    nim: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    jurusan: {
        type: DataTypes.STRING,
        allowNull: false,
    },
});

try {
    await Student.sync();
    console.log("The table Student was created")
} catch (error) {
    console.log("Cannot create table ", error);
}

export default Student;