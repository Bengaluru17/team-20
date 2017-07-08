package com.example.halfbloodprince.amoghhelperapp;

public class Constants {
    private static int score;

    public static int getScore() {
        return score;
    }

    public static void setScore(int score) {
        Constants.score = score;
    }

    public static void increaseScore(int points) {
        Constants.score = Constants.score+points;
    }

    public static void decreaseScore(int points) {
        Constants.score = Constants.score-points;
    }

}
