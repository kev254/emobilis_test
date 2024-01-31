package com.delivero.emob

class Student(name: String, age: Int, val studentId: String) : Person(name, age) {
    fun study() {
        println("$name is studying.")
    }
}