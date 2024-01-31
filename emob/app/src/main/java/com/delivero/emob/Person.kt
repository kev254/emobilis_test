package com.delivero.emob

open class Person(val name: String, val age: Int) {
    fun displayInfo() {
        println("Name: $name, Age: $age")
    }
}