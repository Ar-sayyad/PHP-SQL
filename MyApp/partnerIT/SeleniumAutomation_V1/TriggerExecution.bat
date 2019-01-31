set projectLocation=F:\SeleniumAutomation_V1
cd %projectLocation%
F:
java -cp %projectLocation%\\source\\3rdParty\\*;%projectLocation%\\class\\ org.testng.TestNG TestNGExecutor.xml
