package oopproject;
import oopproject.Staff;

import java.util.InputMismatchException;
import java.util.Scanner;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;

public class DriverClass {
	public static int STAFFID = 0; //These were used to maintain certain values required across different methods in different classes
	public static int STUDENTID =0;
	
	public void addStaff(){ //Method utilized by an admin to add a staff member to the records
		
		Scanner staff = new Scanner(System.in);
		Staff staffObj = new Staff(); //creating an object of the class Staff to utilize its variables and methods
		try { //implementing required file exception handling try block
			
			FileWriter fileobject = new FileWriter("staffrecord.txt", true); //creating a file object to write/store staff information to a file
			System.out.println("New Staff Members Are Registered Here!");
			System.out.println("Enter staff Id");
			int id = staff.nextInt();
			staffObj.setId(id);       //utilizing setter from Staff class to set the id of the new staff member
			fileobject.write(staffObj.getId() + " "); //utilizing getter from staff class to set get the id for storing to a file

			System.out.println("Enter staff password");
			String password = staff.next();
			staffObj.setPassword(password);
			fileobject.write(staffObj.getPassword() + " ");
			
			System.out.println("Enter the First Name ");
			String fname = staff.next();
			staffObj.staffName.setfName(fname);
			fileobject.write(staffObj.staffName.getfName() + " ");

			System.out.println("Enter the Last Name ");
			String lname = staff.next();
			staffObj.staffName.setlName(lname);
			fileobject.write(staffObj.staffName.getlName() + " ");

			System.out.println("Enter staff Faculty");
			String Faculty = staff.next();
			staffObj.setFaculty(Faculty);
			fileobject.write(staffObj.getFaculty() + " ");

			System.out.println("Enter staff Department");
			String Department = staff.next();
			staffObj.setDepartment(Department);
			fileobject.write(staffObj.getDepartment() + " ");

			System.out.println("Enter the day employed");
			int day = staff.nextInt();
			staffObj.dateEmployed.setDay(day);
			fileobject.write(staffObj.dateEmployed.getDay() + " ");

			System.out.println("Enter the month employed");
			int month = staff.nextInt();
			staffObj.dateEmployed.setMonth(month);
			fileobject.write(staffObj.dateEmployed.getMonth() + " ");

			System.out.println("Enter the year employed");
			int year = staff.nextInt();
			staffObj.dateEmployed.setYear(year);
			fileobject.write(staffObj.dateEmployed.getYear() + " ");
			fileobject.write("\r\n"); //adding a new line to seperate each record, for some reason "\n" alone did not work
			fileobject.close(); //closing the file for security reasons, also the values would not be recorded if file was not closed
		} catch (IOException e) { //implementing the catch block for handling thrown exceptions
			System.err.println("Could not open file");
		}
		catch(InputMismatchException i){ //implementing inputmismatch for invalid datatype values entered
			System.err.println("Invalid value type enterd\n");
		}
	}
	
	public void addStudent(){ //Method utilized by an admin to add a student member to the records
		Scanner student = new Scanner(System.in);
		Student studentObj = new Student(); //Instantiating an object of type Student
		
		try {

			FileWriter fileobject = new FileWriter("studentrecord.txt", true);

			System.out.println("New Students Are Registered Here!");
			System.out.println("Enter student Id");
			int id = student.nextInt();
			studentObj.setId(id);
			fileobject.write(studentObj.getId() + " ");

			System.out.println("Enter student password");
			String password = student.next();
			studentObj.setPassword(password);
			fileobject.write(studentObj.getPassword() + " ");

			System.out.println("Enter the First Name ");
			String fname = student.next();
			studentObj.studName.setfName(fname);
			fileobject.write(studentObj.studName.getfName() + " ");

			System.out.println("Enter the Last Name ");
			String lname = student.next();
			studentObj.studName.setlName(lname);
			fileobject.write(studentObj.studName.getlName() + " ");
			
			System.out.println("Enter the day enrolled");
			int day = student.nextInt();
			studentObj.dateEnrolled.setDay(day);
			fileobject.write(studentObj.dateEnrolled.getDay() + " ");

			System.out.println("Enter the month enrolled");
			int month = student.nextInt();
			studentObj.dateEnrolled.setMonth(month);
			fileobject.write(studentObj.dateEnrolled.getMonth() + " ");

			System.out.println("Enter the year employed");
			int year = student.nextInt();
			studentObj.dateEnrolled.setYear(year);
			fileobject.write(studentObj.dateEnrolled.getYear() + " ");

			System.out.println("Enter student's Adrress");
			String address = student.next();
			studentObj.setAddress(address);
			fileobject.write(studentObj.getAddress() + " ");

			System.out.println("Enter student's contact number");
			String contactnum = student.next();
			studentObj.setContactNum(contactnum);
			fileobject.write(studentObj.getContactNum() + " ");

			System.out.println("Enter Programme to be enrolled in <Certificate/Diploma/Associate>");
			String programmeenr = student.next();
			studentObj.setProgrammeEnr(programmeenr);
			fileobject.write(studentObj.getProgrammeEnr() + " ");
			fileobject.write("\r\n");
			fileobject.close();
		} catch (IOException e) {
			System.err.println("Could not open file");
		}
		catch(InputMismatchException i){
			System.err.println("Invalid value type enterd\n");
		}
	}
	
	public void addProgramme(){ //Method utilized by an admin to add a programme to the records
		Scanner programme = new Scanner(System.in);
		Programme programmeObj = new Programme();
		
			System.out.println("Programmes are Recorded Here!");
			System.out.println("Enter the programme Name ");
			String name = programme.next();
			String result = name.toUpperCase();
			programmeObj.setName(result);
			
			if(!(programmeObj.getName().equals("CERTIFICATE") || programmeObj.getName().equals("DIPLOMA") || programmeObj.getName().equals("ASSOCIATE"))){
				System.out.println("Invalid programme name entered"); //ensuring that only three specific type of programmes can be added
				addProgramme();//if an invalid programme name is entered the process is restarted
			}else{
				try{
					System.out.println("Enter Programme Code");
					String code = programme.next();
					programmeObj.setCode(code);
				
				System.out.println("Enter the maximum number of courses");

				int maxnumcourse = programme.nextInt();
				programmeObj.setMaxNumCourse(maxnumcourse);

				if(programmeObj.getName().equals("CERTIFICATE")){ //ensuring the value entered for maximum number of courses for each programme does not exceed or becomes lower than required amount
					if(programmeObj.getMaxNumCourse()>4  || programmeObj.getMaxNumCourse()<4){
					System.out.println("The number of courses for Certificate programme cannot exceed or be lower than 4");
					addProgramme();
				}
				}
				else if(programmeObj.getName().equals("DIPLOMA")){
					if(programmeObj.getMaxNumCourse()>6 || programmeObj.getMaxNumCourse()<6){
					System.out.println("The number of courses for Diploma programme cannot exceed or be lower than 6");
					addProgramme();
					}
				}
				else if(programmeObj.getName().equals("ASSOCIATE")){
					if(programmeObj.getMaxNumCourse()>8 || programmeObj.getMaxNumCourse()<8){
					System.out.println("The number of courses for Associate programme cannot exceed or be lower than 8");
					addProgramme();
					}
				}
				else{
					System.out.println("Invalid amount of course(s) entered for this programme");
					addProgramme();
				}
					FileWriter fileobject = new FileWriter("programmerecord.txt", true);
					//writing the record to the file if the tests are passed above
					fileobject.write(programmeObj.getCode() + " ");
					fileobject.write(programmeObj.getName() + " ");
					fileobject.write(programmeObj.getMaxNumCourse() + " ");

					System.out.println("Enter the name of the award for this programme");
					String award = programme.next();
					programmeObj.setAward(award);
					fileobject.write(programmeObj.getAward() + " ");

					System.out.println("Is this course Accredited? <yes/no>");
					String accredited = programme.next();
					programmeObj.setAccredited(accredited);
					fileobject.write(programmeObj.getAccredited() + " ");

					fileobject.write("\r\n");
					fileobject.close();
				}catch (IOException e) {
				 System.err.println("Could not open file");
				 }
				catch(InputMismatchException i){
					System.err.println("Invalid value type enterd\n");
				}
				System.out.println("Courses for each programme are added here!");//A course must be added for a programme
				Scanner course = new Scanner(System.in);
				Course courseObj = new Course();
				try{
				FileWriter fileobject = new FileWriter("programmerecord.txt", true);
				
					System.out.println("Courses are Recorded Here!");
					System.out.println("Enter the Course Name ");
					String name2 = course.next();
					String result2 = name2.toUpperCase();
					courseObj.setName(result2);
					fileobject.write(courseObj.getName() + " ");
					
					System.out.println("Enter Course Code");
					String code2 = course.next();
					courseObj.setCode(code2);
					fileobject.write(courseObj.getCode() + " ");
					
					System.out.println("Enter the description of the course for this programme");
					String description = course.next();
					courseObj.setDescription(description);
					fileobject.write(courseObj.getDescription() + " ");
					
					System.out.println("Enter the credits for this course");
					int credits = course.nextInt();
					courseObj.setCredits(credits);
					fileobject.write(courseObj.getCredits()+ "");
					
					System.out.println("Enter the duration for this course <number of months e.g. 5>");
					int duration = course.nextInt();
					courseObj.setDuration(duration);
					fileobject.write(courseObj.getDuration() + " ");
					fileobject.write("\r\n");
					fileobject.close();
					
				}catch(IOException a){
					System.err.println("Could not open file");
				}
	}
	}
	
	
	
	public static void main(String[] args) {
		User userobj = new User();
		userobj.validateCredentials();
		
	}

}
