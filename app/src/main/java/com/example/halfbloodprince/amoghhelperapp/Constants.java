package com.example.halfbloodprince.amoghhelperapp;

public class Constants {
    private static int score;
    private static int correct;
    private static int incorrect;

    public static int getIncorrect() {
        return incorrect;
    }

    public static void increaseIncorrect() {
        Constants.incorrect = Constants.incorrect+1;
    }

    public static int getCorrect() {

        return correct;
    }

    public static void increaseCorrect() {
        Constants.correct = Constants.correct+1;
    }

    public static int getScore() {
        return score;
    }

    public static void setScore(int score) {
        Constants.score = score;
    }

    public static void setCorrect(int score) {
        Constants.correct = score;
    }

    public static void setIncorrect(int score) {
        Constants.incorrect = score;
    }

    public static void increaseScore(int points) {
        Constants.score = Constants.score+points;
    }

    public static void decreaseScore(int points) {
        Constants.score = Constants.score-points;
    }

}
