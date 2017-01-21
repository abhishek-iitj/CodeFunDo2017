package com.example.jarvis.loginapplication;

import java.util.ArrayList;

public class Movie {
    private String name,mobile,address;//thumbnailUrl,
    private String room;

//    private ArrayList<String> genre;

    public Movie() {
    }

    public Movie(String name, String room, String mobile,
                 String address) {
        this.name = name;
        //this.thumbnailUrl = thumbnailUrl;
        this.room = room;
        this.mobile = mobile;
        this.address = address;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile;
    }

    public String getRoom() {
        return room;
    }

    public void setRoom(String Room) {
        this.room = Room;
    }


    public String getAddress () {
        return address;
    }

    public void setAddress(String address) {
        this.address=address;
    }

}
