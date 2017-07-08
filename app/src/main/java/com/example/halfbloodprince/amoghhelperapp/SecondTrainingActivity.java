package com.example.halfbloodprince.amoghhelperapp;

import android.content.Intent;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;

public class SecondTrainingActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener{
    Spinner qSpinner2;
    TextView qResult2;
    Button qNextButton2;
    TextView scoreButton;
    String options[]={"Phone call","Mail","Message","Skype"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second_training);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        qResult2 = (TextView)  findViewById(R.id.qResult2);
        qSpinner2 = (Spinner) findViewById(R.id.qSpinner2);
        qNextButton2 = (Button) findViewById(R.id.qNextButton2);
        scoreButton= (TextView) findViewById(R.id.scoreButton2);
        Constants.increaseScore(10);
        scoreButton.setText("Score: "+Constants.getScore());

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.options_array, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        qSpinner2.setAdapter(adapter);
        qSpinner2.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                if(options[position].equals("Mail")) {
                    qResult2.setVisibility(View.VISIBLE);
                    qResult2.setTextColor(getResources().getColor(R.color.colorGreen));
                    qResult2.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_check_circle_black_24dp,0,0,0);
                    qResult2.setText(R.string.correct_answer);
                    qNextButton2.setClickable(true);
                    qNextButton2.setEnabled(true);
                    Constants.increaseScore(50);
                }
                else {
                    qResult2.setVisibility(View.VISIBLE);
                    qResult2.setTextColor(getResources().getColor(R.color.colorRed));
                    qResult2.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_close_black_24dp,0,0,0);
                    qResult2.setText(R.string.incorrect_answer);
                    qNextButton2.setClickable(false);
                    qNextButton2.setEnabled(false);
                    Constants.decreaseScore(10);
                }
                scoreButton.setText("Score: "+Constants.getScore());
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
            }
        });
        qNextButton2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(SecondTrainingActivity.this,ThirdTrainingActivity.class));
            }
        });
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
            startActivity(new Intent(SecondTrainingActivity.this,FirstTrainingActivity.class));
        } else if(id==R.id.level2){

        } else if(id==R.id.level3){
            startActivity(new Intent(SecondTrainingActivity.this,ThirdTrainingActivity.class));
        } else if(id==R.id.level4){
            startActivity(new Intent(SecondTrainingActivity.this,FourthTrainingActivity.class));
        } else if(id==R.id.level5){
            startActivity(new Intent(SecondTrainingActivity.this,FifthTrainingActivity.class));
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
