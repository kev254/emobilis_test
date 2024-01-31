package com.delivero.emob

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.LinearLayout
import android.widget.TextView

// MainActivity.kt
class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // Assuming you have a Person and Student objects
        val person = Person("Kevin Test", 50)
        val student = Student("Alice Smith", 12, "EM20235")

        // Show Person details
        showPersonDetails(person)

        // Show Student details
        showStudentDetails(student)
    }

    private fun showPersonDetails(person: Person) {
        val personLayout = findViewById<LinearLayout>(R.id.personLayout)
        val tvName = personLayout.findViewById<TextView>(R.id.tvName)
        val tvAge = personLayout.findViewById<TextView>(R.id.tvAge)

        tvName.text = "Name: ${person.name}"
        tvAge.text = "Age: ${person.age}"
    }

    private fun showStudentDetails(student: Student) {
        val studentLayout = findViewById<LinearLayout>(R.id.studentLayout)
        val tvName = studentLayout.findViewById<TextView>(R.id.tvName)
        val tvAge = studentLayout.findViewById<TextView>(R.id.tvAge)
        val tvStudentId = studentLayout.findViewById<TextView>(R.id.tvStudentId)

        tvName.text = "Name: ${student.name}"
        tvAge.text = "Age: ${student.age}"
        tvStudentId.text = "Student ID: ${student.studentId}"
    }
}
