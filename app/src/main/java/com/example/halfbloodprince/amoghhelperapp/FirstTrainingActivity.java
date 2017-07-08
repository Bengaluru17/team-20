package com.example.halfbloodprince.amoghhelperapp;

import android.content.ClipData;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class FirstTrainingActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    Button okButton1;
    TextView scoreButton;
    TextView qResult1,qLabel1;
    private static int count=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_first_training);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        Constants.setScore(0);
        okButton1 = (Button) findViewById(R.id.qOKButton1);
        qResult1 = (TextView) findViewById(R.id.qResult1);
        qLabel1 = (TextView) findViewById(R.id.qLabel1);
        scoreButton= (TextView) findViewById(R.id.scoreButton);
        scoreButton.setText("Score: "+Constants.getScore());

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        okButton1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                increaseCount();
                if(count>=3){
                    qResult1.setVisibility(View.VISIBLE);
                    Constants.increaseScore(50);
                    scoreButton.setText("Score: "+Constants.getScore());
                    startActivity(new Intent(FirstTrainingActivity.this,SecondTrainingActivity.class));

                }
                else{
                    Toast.makeText(FirstTrainingActivity.this, "No. of taps: "+count, Toast.LENGTH_SHORT).show();
                }
            }
        });

    }

    private static void increaseCount(){
        count=count +1;
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.first_training, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.

        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_score) {

            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.level1) {
        } else if(id==R.id.level2){
            startActivity(new Intent(FirstTrainingActivity.this,SecondTrainingActivity.class));
        } else if(id==R.id.level3){
            startActivity(new Intent(FirstTrainingActivity.this,ThirdTrainingActivity.class));
        } else if(id==R.id.level4){
            startActivity(new Intent(FirstTrainingActivity.this,FourthTrainingActivity.class));
        } else if(id==R.id.level5){
            startActivity(new Intent(FirstTrainingActivity.this,FifthTrainingActivity.class));
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
